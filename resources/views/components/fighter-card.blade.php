@props(['fighter'])
<article>
    <h3><a href="{{ route('fighters.show', $fighter) }}">{{ $fighter->title }}</a></h3>
    <p>{{ $fighter->city->name }} — {{ number_format((float) $fighter->price, 2, ',', ' ') }} €</p>
    <p><a href="{{ route('styles.show', $fighter->style->value) }}">{{ $fighter->style->label() }}</a> · {{ $fighter->user->name }}</p>
</article>
