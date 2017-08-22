{{ Form::open(['url' => '/domain/api/currencies', 'method' => 'POST']) }}

Purchase: <input type="text" name="amount" value="{{ Input::has('amount') ? Input::get('amount') : '1.00' }}" size="6" /> <b>USD</b> in
<select name="currencies">
    @foreach($currencies as $symbol => $currency)
    <option value="{{ $symbol }}" {{ Input::has('currencies') && Input::get('currencies') == $symbol ? ' selected' : '' }}>{{ $currency }}</option>
    @endforeach
</select>
<br />

@if (Request::isMethod('post'))
<h3>Amount payable: {{ $total }} USD</h3><br />
@endif

<input type="submit" value="Buy Currency"/>

{{ Form::close() }}