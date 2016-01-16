<?php namespace Cms\Modules\Forum\Http\Controllers\Backend;

use Cms\Modules\Core\Http\Controllers\BaseBackendController;
use Cms\Modules\Forum\Models\Category;
use Former;
use Cms\Modules\Forum\Http\Controllers\Backend\BaseController;

class BaseController extends BaseBackendController
{

    public function boot()
    {
        parent::boot();

        $this->theme->setTitle('Forum');
        $this->theme->breadcrumb()->add('Forum', route('backend.forum.category.manager'));
    }

    public function formAssets()
    {
        $this->theme->asset()->add('slugify', 'modules/forum/backend/js/editor.js', ['app.js']);
    }

    public function getDetails(Category $category)
    {
        Former::populate($category);

        $this->theme->appendTitle(' > '.e($category->name));
        $this->theme->breadcrumb()->add($category->name, '#');

        return compact('category');
    }

}
