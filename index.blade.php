@extends('admin.layout.layout')



@section('content')

<table class="table">
    <thread>
        <tr>
            <th>S.no</th>
            <th>Category Name</th>
            <th>Parent Category Name</th>
            <th>Create Date</th>
        </tr>
    </thread>
    <tbody>
         @foreach($categories as $key=>$categorie)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$categorie->name}}</td>
            <td>
                @if($categorie->category_id)
                  {{$categorie->parent->name}}
                @else
                  No parent category
                @endif
            </td>
            <td>{{$categorie->created_at}}</td>
            <td>
                <a href="{{route('category.edit',$categorie->id)}}" style="font-size:17px;padding:5px;"><i class="fa fa-edit"></i></a>
                <a href="javascript::void(0)" style="font-size:17px;padding:5px;" data-id="{{$categorie->id}}" class="category_delete"><i class="fa fa-trash" ></i></a>
            </td>

         </tr>
         @endforeach
    </tbody>
</table>





@endsection

@push('footer-script')
   <script>
    $('.category_delete').on('click',function(){
        if(confirm('Are you sure that you want delete this category.')){
            var id = $(this).data('id');
            $.ajax({
                url:'{{route("category.delete")}}',
                method:'post',
                data:{
                    _token: "{{ csrf_token() }}",
                    'id':id
                },
                success: function(data){
                    location.reload();
                }
            });
        }

    });
    </script>
@endpush