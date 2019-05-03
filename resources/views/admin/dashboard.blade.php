@extends('layouts.app')

@section('content')


       <div class="row">
           <div class="col-lg-3">
               <div class="card bg-info text-white">
                   <div class="card-header text-center">
                       POSTED
                   </div>

                   <div class="card-body">
                       <h1 class="text-center">{{ $posts_count }}</h1>
                   </div>
               </div>
           </div>

           <div class="col-lg-3">
               <div class="card bg-danger text-white">
                   <div class="card-header text-center">
                       TRASHED POSTS
                   </div>

                   <div class="card-body">
                       <h1 class="text-center">{{ $trashed_count }}</h1>
                   </div>
               </div>
           </div>

           <div class="col-lg-3">
               <div class="card bg-success text-white">
                   <div class="card-header text-center">
                       USERS
                   </div>

                   <div class="card-body">
                       <h1 class="text-center">{{ $users_count }}</h1>
                   </div>
               </div>
           </div>

           <div class="col-lg-3">
               <div class="card bg-dark text-white">
                   <div class="card-header text-center">
                      CATEGORY
                   </div>

                   <div class="card-body">
                       <h1 class="text-center">{{ $categories_count }}</h1>
                   </div>
               </div>
           </div>
       </div>


@endsection
