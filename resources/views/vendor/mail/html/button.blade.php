@props([
    'url',
    'color' => 'success',
])
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<button style="border: 0; border-radius: .2rem; background-color: green; padding: .6rem;" target="_blank" rel="noopener"><a href="{{$url}}" target="_blank"  style="color: white; text-decoration: none; padding: .5rem; font-size: 16px;">{{ $slot }}</a></button>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
