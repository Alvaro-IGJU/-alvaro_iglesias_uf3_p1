@include('layout.header')
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
<h1
    style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif; font-weight: bold; margin-left: 11%">
    {{ $title }}</h1>

@if (empty($films))
    <FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <div align="center">
        <table border="1x solid" style=" border-collapse: collapse;
            width: 50%;  background-color: rgba(34, 34, 34, 0.767); color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calii, 'Trebuchet MS', sans-serif;  ">
            <tr>
                @foreach ($films as $film)
                    @foreach (array_keys($film) as $key)
                        <th style=" padding: 8px;
  text-align: left;
  border: 3px solid #ddd;">
                            {{ $key }}</th>
                    @endforeach
                @break
            @endforeach
        </tr>

        @foreach ($films as $film)
            <tr>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;">
                    {{ $film['name'] }}
                </td>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;">
                    {{ $film['year'] }}
                </td>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;">
                    {{ $film['genre'] }}
                </td>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;">
                    {{ $film['country'] }}
                </td>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;">
                    {{ $film['duration'] }}
                </td>
                <td style=" padding: 8px;text-align: left;border: 3px solid #ddd;"><img
                        src={{ $film['img_url'] }} style="width: 100px; height: 120px;" /></td>

            </tr>
        @endforeach
    </table>
</div>

@endif
@include('layout.footer')
