<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Cloudinary;
use Exception;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(9);

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.members.show', compact('member'));
    }

    public function store(StoreMemberRequest $request)
    {
        try {
            $profile_img = Cloudinary::upload($request->file('profile_img')->getRealPath());

            $profile_img_id = $profile_img->getPublicId();
            $profile_img_url = $profile_img->getSecurePath();

            Member::create([
                'slug' => $request->slug,
                'name' => $request->name,
                'career' => $request->career,
                'introduction' => $request->introduction,
                'profile_img_id' => $profile_img_id,
                'profile_img_url' => $profile_img_url,
                'instagram_url' => $request->instagram_url,
                'tiktok_url' => $request->tiktok_url,
                'twitter_url' => $request->twitter_url,
                'youtube_url' => $request->youtube_url,
            ]);

            session()->flash('success', '出品者を作成しました。');

            return redirect(route('admin.members.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '出品者を作成できませんでした。');

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.members.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
        try {
            $member = Member::findOrFail($id);

            $member->slug = $request->slug;
            $member->name = $request->name;
            $member->career = $request->career;
            $member->introduction = $request->introduction;

            if ($request->hasFile('profile_img')) {
                Cloudinary::destroy($member->profile_img_id);

                $profile_img = Cloudinary::upload($request->file('profile_img')->getRealPath());
                $profile_img_id = $profile_img->getPublicId();
                $profile_img_url = $profile_img->getSecurePath();
                $member->profile_img_id = $profile_img_id;
                $member->profile_img_url = $profile_img_url;
            }

            $member->instagram_url = $request->instagram_url;
            $member->tiktok_url = $request->tiktok_url;
            $member->twitter_url = $request->twitter_url;
            $member->youtube_url = $request->youtube_url;

            $member->save();

            session()->flash('success', '出品者を更新しました。');

            return redirect(route('admin.members.show', $member));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '出品者を更新できませんでした。');

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);

            Cloudinary::destroy($member->profile_img_id);

            // TODO: ここで関連する企画（Plan）を論理削除する
            $member->delete();

            session()->flash('success', '出品者を削除しました。');

            return redirect(route('admin.members.index'));
        } catch (Exception $e) {
            Log::error($e);

            session()->flash('error', '出品者を削除できませんでした。');

            return back();
        }
    }
}
