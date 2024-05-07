@include('layouts.header')
<div class="container">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('notes.store') }}" method="post">
                 @csrf
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Note Title" name="title">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                      </div>
                     </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                </form>
               </div>
              </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-5 d-flex justify-content-between">
                <form class="d-flex" action="{{ route('search') }}" method="post">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </div>
        </div>


        <div class="row">
            <div class="d-flex justify-content-between">
                <h2>Notes</h2>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <!--Query-->
            <?php
                $notes = App\Models\Note::where('user_id',Auth::user()->id)->latest()->get();
            ?>
        <!--query end-->

        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Creation date</th>
                <th scope="col">Last Modified date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>
                        <td>{{ $note->created_at }}</td>
                        <td>{{ $note->updated_at }}</td>
                        <td>
                            <div class="btn-group me-2">
                                <a href="{{ route('notes.edit',$note->id ) }}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('notes.destroy',$note->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button  class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-delete-left"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </main>
</div>


@include('layouts.footer')
