@include('layouts.header')
<div class="container">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

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
