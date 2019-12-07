@extends('layouts.blog-layout')
@section('title')
  Blog - {{ $post->title }}
@endsection
@section('content')
  <header style="background-image: url('{{ url($post->thumbnail) }}')">
    @include('layouts.navbar')
    <div class="glass">
      <h1>{{ $post->{'title'.session('lang')} }}</h1>
      <div class="author">
        <div class="img-container">
          <img class="img-fluid" src="{{ asset($post->users->dp) }}" alt="">
        </div>
        <p><a href="#">{{ $post->users->name }}</a></p>
      </div>
      <p class="date">{{ $post->updated_at->format('l, F j Y, h:i:s A') }}</p>
    </div>
  </header>
  <div class="row m-0">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <article>
        {!! $post->{'content'.session('lang')} !!}
        {{-- <img class="img-fluid first-image" src="{{ asset('img/blog-1.jpg') }}" alt="">
        <br><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
      </article>

      <div class="prev-next-article">
        <div class="row m-0">
          <div class="col-md-6 text-left">
            <p><strong>Previous Article</strong></p>
            <p><a href="{{ ($prevPost) ? $prevPost->title_slug : '' }}">{{ $prevPost ? $prevPost->{'title'.session('lang')} : ''}}</a></p>
          </div>
          <div class="col-md-6 text-right">
            <p><strong>Next Article</strong></p>
            <p><a href="{{ ($nextPost) ? $nextPost->title_slug : '' }}">{{ $nextPost ? $nextPost->{'title'.session('lang')} : '' }}</a></p>
          </div>
        </div>
      </div>
      <hr class="border">
      <div class="tags">
        <p class="tags-title">Tags</p>
        @foreach ($post->tags as $tag)
          <a class="tags-text" href="#">{{ $tag->name }}</a>
        @endforeach
      </div>
      <hr class="border">
      <div class="tags">
        <p class="tags-title">Categories</p>
        @foreach ($post->categories as $category)
          <a class="tags-text" href="#">{{ $category->name }}</a>
        @endforeach
      </div>
      <hr class="border">
      <p class="my-5" id="scrollToComments">&nbsp;</p>

      <div class="comment-box mt-2 mx-2">
          <span id="comment-area"></span>
          <form class="" action="{{ url('post-comments/comments') }}" method="post">
            <div class="form-group">
              <label class="h3" for="comment-textarea">Comment Article</label>
              <textarea id="comment-textarea" class="form-control" rows="5" name="content" reply="" placeholder="Comments Here"></textarea>
              <div class="comment-txt-bottom p-2 position-relative">
                <p class="login-comment m-0 px-3">{{ (!Auth::user()) ? 'LOG IN WITH' : ''}}</p>
                {{-- <p class="login-comment m-0 px-2"> <img class="img img-fluid px-1" style="height:30px; border-radius:50%;" src="{{ session('user_sos')->dp }}" alt=""> Hello {{ session('user_sos')->name }}</p> --}}
                @if (!Auth::user())
                  <p class="m-0">
                    <span><a href="{{ url('login/google') }}"><i class="fab fa-google-plus"></i></a></span>
                    <span><a href="{{ url('login/github') }}"><i class="fab fa-github"></i></a></span>
                    <span><a href="{{ url('login/facebook') }}"><i class="fab fa-facebook"></i></a></span>
                    {{-- <span><a href="#"><i class="fab fa-instagram"></i></a></span> --}}
                    {{-- <span><a href="#"><i class="fab fa-twitter"></i></a></span> --}}
                  </p>
                @else
                  <p class="m-0"><strong class="replyTo"></strong></p>
                @endif
                <div class="btn-comments">
                  <p class="m-0">
                    <button id="comment-send" class="form-control btn btn-primary" type="submit" name="comment" reply="" >Comments</button>
                  </p>
                  <p class="m-0">
                    <button id="comment-reset" class="form-control btn btn-primary" type="reset">Resets</button>
                  </p>
                </div>
              </div>
            </div>
            <input type="hidden" name="id_posts" value="{{ $id }}">
            <input id="comments_on_comment" type="hidden" name="comments_on_comment" value="0">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
          <div class="comment-user">
            @foreach ($parentComments as $keyP => $parent)
                <div class="comment-cont p-3" val="{{ $parent->id }}">
                  <div class="comment-header">
                    <p class="user-name user-name-parent m-0"><a href="#">{{ $parent->users->name }}</a></p>
                    <p class="date-post"><small>{{ $parent->updated_at->format('l, F j Y, h:i:s A') }}</small></p>
                    <div class="user-dp img-container"><a href="#"><img class="img img-fluid" src="{{ asset($parent->users->dp) }}" alt="User"></a></div>
                  </div>
                  <div class="comment-content">
                    <p>{{ $parent->content }}</p>
                  </div>
                  <div class="comment-foot">
                    <div class="btn-foot-comments">
                      <p class="">
                        <button class="form-control btn btn-primary reply-comments" val="" type="button" name="reply">Reply</button>
                      </p>
                      <p class="">
                        @if (Auth::user() && Auth::user()->id == $parent->users->id)
                          <form class="" action="{{ url('post-comments/delete').'/'.$parent->id }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="form-control btn btn-primary" type="submit">Delete</button>
                          </form>
                        @endif
                      </p>
                    </div>
                  </div>
                  @foreach ($childComments as $keyC => $child)
                          <!-- sub replyannya -->
                      @if ($child->comments_on_comment == $parent->id)
                        <div class="comment-cont p-3">
                          <div class="comment-header">
                            <p class="user-name m-0"><a href="#">{{ $child->users->name }}</a></p>
                            <p class="date-post"><small>{{ $child->updated_at->format('l, F j Y, h:i:s A') }}</small></p>
                            <div class="user-dp img-container"><a href="#"><img class="img img-fluid" src="{{ asset($child->users->dp) }}" alt="User"></a></div>
                          </div>
                          <div class="comment-content">
                            <p>{{ $child->content }}</p>
                          </div>
                          <div class="comment-foot">
                            <div class="btn-foot-comments">
                              <p class="">
                                @if (Auth::user() && Auth::user()->id == $child->users->id)
                                  <form class="" action="{{ url('post-comments/delete').'/'.$child->id }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="form-control btn btn-primary" type="submit">Delete</button>
                                  </form>
                                @endif
                              </p>
                            </div>
                          </div>
                        </div>
                      @endif
                   @endforeach
                </div>
            @endforeach

            <a class="toCommentTop" href="#comment-area"></a>
          </div>
      </div>

    </div>
    <div class="col-md-3"></div>
  </div>
@endsection
@section('js')
  <script src="{{ asset('js/sweetalert2.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('click', '.reply-comments', function(e) {
      comments_on_comment = $(this).parents('.comment-cont').attr('val');
      replyTo = $(this).parents('.comment-cont').find('.user-name-parent a').text();
      $('.replyTo').html('Reply To '+replyTo+' <i class="text-danger fas fa-times"></i>');
      $('#comments_on_comment').val(comments_on_comment);
      location.href = '#scrollToComments';
      $('#comment-textarea').focus();
    });
    $(document).on('click', '.replyTo', function(e) {
      $(this).html('');
      $('#comments_on_comment').val('0');
      location.href = '#scrollToComments';
      $('#comment-textarea').focus();
    });
    @if ($message = Session::get('success'))
      Swal.fire(
      'Thanks!',
      '{{ $message }}',
      'success'
      )
    @elseif ($message = Session::get('danger'))
      Swal.fire(
      'Sorry!',
      '{{ $message }}',
      'warning'
      )
    @endif
  </script>
@endsection
