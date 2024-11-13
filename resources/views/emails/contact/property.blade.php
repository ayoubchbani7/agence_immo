<x-mail::message>
# Nouvelle demande

Une nouvelle demande de contact a été bien <a href="{{route('property.show',['slug'=> $property->getSlug(),'property' =>$property ])}}">{{$property->title}}</a>
<br>
    - Prénom  : {{$data['firstname']}}<br>
    - Nom  : {{$data['lastname']}}<br>
    - Téléphone  : {{$data['tele']}}<br>
    - Email  : {{$data['email']}}<br>
    <br>

**Message : ** <br>
{{$data['message']}}<br>

</x-mail::message>
