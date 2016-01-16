<?php namespace Cms\Modules\Forum\Http\Controllers\Frontend;

use BeatSwitch\Lock\Integrations\Laravel\Facades\Lock;
use Cms\Modules\Forum\Http\Requests\PostEditRequest;
use Cms\Modules\Forum\Models\Post;
use Cms\Modules\Forum\Services\PostService;

class PostController extends BaseController
{
    public $layout = '2-column-left';

    public function boot()
    {
        $this->setSidebar('forum_default');
    }

    /**
     * Show a thread
     *
     * @param  integer $thread_id
     * @param  Cms\Modules\Forum\Services\PostService $postService
     *
     * @return View
     */
    public function getForm(Post $post, PostService $postService)
    {
        $data = $postService->getDataById($post->id);

        return $this->setView('frontend.pages.post.edit', $data);
    }

    public function postForm(Post $post, PostEditRequest $input) {
        $update = $post->hydrateFromInput($input->except(['_token']));
        if ($update->save() === false) {
            return redirect()->back()
                ->withError('Post could not be updated, please try again.');
        }

        return redirect(array_get($post->transform(), 'links.self'))
            ->withInfo('Post updated successfully.');
    }

}