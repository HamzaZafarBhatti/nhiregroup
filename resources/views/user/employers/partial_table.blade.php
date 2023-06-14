@foreach ($employers as $item)
    <tr>
        <td><img src="{{ $item->get_image }}" alt="{{ $item->name }}" class="avatar xl rounded-5"></td>
        <td>
            <h5 class="text-uppercase d-flex flex-column gap-2">
                {{ $item->name }}
                <small>Job Payout: {{ $item->get_earning_amount }}</small>
            </h5>
        </td>
        <td>
            <a href="#" class="btn btn-success" type="button">Start Job</a>
        </td>
    </tr>
@endforeach
