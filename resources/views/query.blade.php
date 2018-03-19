@foreach($search as $data)
{{$data['category']}}
{{$data['value']->name}}
@endforeach