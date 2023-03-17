<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Member;
use App\Models\Plan;
use Carbon\Carbon;
use Cloudinary;
use Exception;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::withTrashed()->paginate(9);

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
                'slug' => $request->slug,
                'title' => $request->title,
                'eyecatch_img_id' => $eyecatch_img->getPublicId(),
                'eyecatch_img_url' => $eyecatch_img->getSecurePath(),
                'description' => $request->description,
                'started_at' => $request->started_at,
                'finished_at' => $request->finished_at,
                'event_held_at' => $request->event_held_at,
                'event_location' => $request->event_location,
                'event_meeting_location' => $request->event_meeting_location,
                'event_meeting_time' => $request->event_meeting_time,
            ]);

            session()->flash('success', '企画を作成しました。');

            return redirect(route('admin.plans.index'));
        } catch (Exception $e) {
            dd($e);
            Log::error($e);

            session()->flash('error', '企画を作成できませんでした。');

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $members = Member::all();

        return view('admin.plans.edit', compact('plan', 'members'));
    }

    public function update(UpdatePlanRequest $request, $id)
    {
        try {
            $plan = Plan::findOrFail($id);

            $plan->member_id = $request->member_id;
            $plan->slug = $request->slug;
            $plan->title = $request->title;

            if ($request->hasFile('eyecatch_img')) {
                Cloudinary::destroy($plan->eyecatch_img_id);
                $eyecatch_img = Cloudinary::upload($request->file('eyecatch_img')->getRealPath());
                $plan->eyecatch_img_id = $eyecatch_img->getPublicId();
                $plan->eyecatch_img_url = $eyecatch_img->getSecurePath();
            }

            $plan->description = $request->description;
            $plan->started_at = $request->started_at;
            $plan->finished_at = $request->finished_at;
            $plan->event_held_at = $request->event_held_at;
            $plan->event_location = $request->event_location;
            $plan->event_meeting_location = $request->event_meeting_location;
            $plan->event_meeting_time = $request->event_meeting_time;

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
            $started_at = new Carbon($plan->started_at);
            $finished_at = new Carbon($plan->finished_at);
            $now = new Carbon();

            if ($now->between($started_at, $finished_at)) {
                session()->flash('error', 'こちらの企画は現在開催中のため削除できません。');

                return back();
            }

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
