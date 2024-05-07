@include('layouts.header')
<div class="container">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="col-md-6">
                <form action="{{ route('notes.update',$note->id) }}" method="post">
                    @csrf
                    @method('put')
                       <div class="modal-body">
                         <div class="mb-3">
                           <label for="exampleFormControlInput1" class="form-label">Title</label>
                           <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Note Title" name="title" value="{{ $note->title }}">
                         </div>
                       <div class="mb-3">
                           <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ $note->content }}</textarea>
                         </div>
                        </div>
                       <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">update</button>
                         </div>
                   </form>
            </div>
      </main>
</div>
@include('layouts.footer')
