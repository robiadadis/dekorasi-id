@extends('layouts.main')

@section('container')
    <h1 class="text-2xl font-bold mb-4">Account Information</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <h2 class="text-2xl font-bold my-4">Order History</h2>
    <div class="overflow-x-auto">
        <div class="sm:w-full">
            <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-300 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Detail
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Link
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach($orders->sortByDesc('created_at') as $index => $order)
                                @if($order->status !== 'Unpaid')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->product->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="/invoice/{{ $order->id }}" target="_blank" class="text-blue-500 hover:underline">Invoice</a>
                                        </td>                                    
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="http://{{ $order->product->link }}" target="_blank" class="text-blue-500 hover:underline">Download</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
