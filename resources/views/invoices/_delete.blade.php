<form action="{{ url('invoices/'.$invoice->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash"></i> Delete
    </button>
</form> 
