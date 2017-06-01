<?php

namespace App\Services\v1;

use App\Category;
use Illuminate\Support\Str;

class CategoriesService {

    public function getCategories($parameters) {
        if (isset($parameters) && !empty($parameters)) {
            if (isset($parameters['name'])) {

                $categories = Category::all();
                $categoriesSearch = new \Illuminate\Database\Eloquent\Collection();

                foreach($categories as $category)
                {
                    if(Str::contains(Str::lower($category->name), Str::lower($parameters['name']))) {
                        $categoriesSearch->add($category);
                    }
                }
                return $categoriesSearch;
            }
        }
        else {
            return $this->filterCategories(Category::all());
        }
    }

    protected function filterCategories($categories) {
        $data = [];

        foreach ($categories as $category) {
            $entry = [
                'id' => $category->id,
                'name' => $category->name,
                'created_at' => $category->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $category->updated_at->format('Y-m-d H:i:s'),
                'href' => route('categories.show', ['id' => $category->id])
            ];

            $data[] = $entry;
        }

        return $data;
    }

    public function getCategory($categoryId) {
        return $this->filterCategories(Category::where('id', $categoryId)->get());
    }

    public function createCategory($req) {
        $category = new Category();

        $category->name = $req->input('name');

        $category->save();

        return $this->filterCategories([$category]);
    }

    public function updateCategory($req, $id) {
        $category = Category::where('id', $id)->firstOrFail();

        if ($req->input('name') != null) {
            $category->name = $req->input('name');
        }

        $category->save();

        return $this->filterCategories([$category]);
    }

    public function deleteCategory($id) {
        $category = Category::where('id', $id)->firstOrFail();
        $category->delete();
    }
}