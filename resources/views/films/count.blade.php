@include("layout.header")
<div
style="
content: '';
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
opacity: 1;
filter: ightness(0.9);
background-size: cover;
background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.6) 50%, transparent), url('{{ asset('img/background.jpg') }}');
box-shadow: inset 0 20px 70px rgba(0, 0, 0, 0.9); 

">
</div>
<h1 style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold; margin-left: 11%">{{ $title }}</h1>

@if (empty($films))
    <FONT style="font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold; margin-left: 11%" COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <FONT style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif;  margin-left: 11%" COLOR="black">Hay un total de {{ $films }} películas</FONT>
@endif
@include("layout.footer")