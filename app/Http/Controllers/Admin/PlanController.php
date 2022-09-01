<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Member;
use App\Models\Plan;
use Cloudinary;
use Exception;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::paginate(9);

        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        $members = Member::all();

        return view('admin.plans.create', compact('members'));
    }

    public function show($id)
    {
        $plan = Plan::findOrFail($id);

        return view('admin.plans.show', compact('plan'));
    }

    public function store(StorePlanRequest $request)
    {
        try {
            $eyecatch_img = Cloudinary::upload($request->file('eyecatch_img')->getRealPath());

            Plan::create([
                'member_id' => $request->member_id,
                'title' => $request->title,
                'eyecatch_img_id' => $eyecatch_img->getPublicId(),
                'eyecatch_img_url' => $eyecatch_img->getSecurePath(),
                'description' => $request->description,
                'opened_at' => $request->opened_at,
                'closed_at' => $request->closed_at,
                'fundraising_ratio' => $request->fundraising_ratio
            ]);

            session()->flash('success', '企画を作成しました。');

            return redirect(route('admin.plans.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '企画を作成できませんでした。');

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        return view('admin.plans.edit', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, $id)
    {
        try {
            $plan = Plan::findOrFail($id);

            $plan->member_id = $request->member_id;
            $plan->title = $request->title;

            if ($request->hasFile('eyecatch_img')) {
                Cloudinary::destroy($plan->eyecatch_img_id);
                $eyecatch_img = Cloudinary::upload($request->file('eyecatch_img')->getRealPath());
                $plan->eyecatch_img_id = $eyecatch_img->getPublicId();
                $plan->eyecatch_img_url = $eyecatch_img->getSecurePath();
            }

            $plan->description = $request->description;
            $plan->opened_at = $request->opened_at;
            $plan->closed_at = $request->closed_at;
            $plan->fundraising_ratio = $request->fundraising_ratio;

            $plan->save();

            session()->flash('success', '企画を更新しました。');

            return redirect(route('admin.plans.show', $plan));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '企画を更新できませんでした。');

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $plan = Plan::findOrFail($id);

            Cloudinary::destroy($plan->eyecatch_img_id);

            // TODO: ここで関連する入札歴（Bid）を論理削除する
            $plan->delete();

            session()->flash('success', '企画を削除しました。');

            return redirect(route('admin.plans.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '企画を削除できませんでした。');

            return back();
        }
    }
}
