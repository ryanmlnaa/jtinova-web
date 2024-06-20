@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'TEFA JTI Innovation')
<img src="{{asset('static/logo.png')}}" class="logo" alt="TEFA JTI Innovation">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
