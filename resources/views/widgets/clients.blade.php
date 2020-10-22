<div class="fusection4">
    <div class="container">
        <h2 class="untext">{{$page->name}}</h2>
        <div class="clients">
            <div class="container">
                <p>{{$page->short_description}} </p>
                <br />

                <ul id="mycarouselthree" class="jcarousel-skin-tango">
                    @foreach($clients as $obj)
                    <li><img src="{{asset($obj->image->file_path)}}" alt="{{$obj->image->alt_text}}" /></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>