@extends('layouts.admin');

@section('content')
     <form action="{{ action('AdminPostsController@store') }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
             {{ csrf_field() }}
             <div class="form-group">

                 <label for="title"><span>عنوان</span></label>
                 <input id="title" name="title" type="text" class="text-left input-lg">

             </div>

             <div class="form-group">

                 <label for="category"><span>پسورد</span></label>
                 <select id="category" name="category_id" class="text-left input-lg" id="category">
                     <option disabled selected>انتخاب دسته</option>
                 </select>

             </div>
             <div class="form-group">

                 <label for="photo_id"><span>تصویر</span></label>
                 <input name="photo_id" type="file" class="text-left input-lg">

             </div>

         <div class="form-group">
             <label for="body">توضیحات</label>
             <br>
             <textarea class="form-group" name="body" id="body" rows="3" style="width: 300px; right: auto"></textarea>
         </div>
     	    <div class="form-group">

                 <input name="submit" type="submit" class="btn btn-primary">

             </div>
     </form>
     <div class="row">
     @include('error.form')
     </div>
@stop

