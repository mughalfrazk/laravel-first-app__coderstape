<h1>Customer Details</h1>

<a href="/customers">
< Back</a>
<br />
<br />

<strong>Name</strong>
<p>{{ $customer->name }}</p>

<strong>Name</strong>
<p>{{ $customer->email }}</p>

<br />
<a href="/customers/{{ $customer->id }}/edit">Edit</a>
<form action="/customers/{{ $customer->id }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete</button>
</form>
