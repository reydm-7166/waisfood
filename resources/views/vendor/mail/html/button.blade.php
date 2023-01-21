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
<button class="button button-{{ $color }}" target="_blank" rel="noopener">{{ $slot }}</button>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
