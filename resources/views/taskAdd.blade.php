@extends('tasks')

@section ('dialogBox')

    <form class="form" method="POST" action="{{route('store-task')}}">

        {{ csrf_field() }}

        <div class="btn-right">
            <a href="{{ route('main') }}">&#128473</a>
        </div>
    
        <div class="form-group">
            <label>Summary:</label>
            <input type="text" size="17" class="form-control" name="summary"/>
        </div>
    
        <div class="form-group">
            <label>DueDate:</label>
            <input type="date"  class="form-control" name="due_date"/>
        </div>
    
        <div class="form-group">
            <label>Description:</label>
            <div>
                <textarea name="description" rows="5" cols="30"> </textarea>
            </div>
        </div> 

        
        {{-- buttons --}}
        <div>
            <span class="save">
                <button type="submit"> Submit </button>
            </span>

            <span class="btn-right">
                <a href="{{ route('main') }}"> Cancel </a>
            </span>
        </div>


        @if(count($errors))

            <div class="errorMessageBox">
                
                    <strong> Whoops! </strong> There were some problems with your input. <br/>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

         @endif

    </form>

@endsection