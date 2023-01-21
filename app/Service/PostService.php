<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class PostService
{
    public function store($data){
        try{
            DB::beginTransaction();
            if(isset($data['tag_ids']) && !empty($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['preview_img'])){
                $data['preview_img']=Storage::disk('public')->put('/img/post', $data['preview_img']);
            }
            $data['user_id']=\auth()->user()->id;
            $data['main_img']=Storage::disk('public')->put('/img/post',  $data['main_img']);
            $post=Post::firstOrCreate(['title'=>$data['title']], $data);
            if(isset($tagIds)){
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            \abort(500);
        }
    }
    public function update($data, $post){
        try {
            //dd($data);
            DB::beginTransaction();
            if(isset($data['tag_ids']) && !empty($data['tag_ids'])){
                $tagIds=$data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['preview_img']) && !empty($data['preview_img'])){
                $data['preview_img']=Storage::disk('public')->put('/img/post', $data['preview_img']);
            }
            if(isset($data['main_img']) && !empty($data['main_img'])){
                $data['main_img']=Storage::disk('public')->put('/img/post',  $data['main_img']);
            }
            $post->update($data);
            if(isset($tagIds)){
                $post->tags()->sync($tagIds);
            }else{
                $post->tags()->detach();
            }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            \abort(500);
        }
        return $post;
    }
}
