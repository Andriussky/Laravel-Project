<?php

namespace App\Managers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrdersManager
{
    public function createOrder(Request $request): Order
    {
        DB::beginTransaction();

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make(Str::random(8)),   // random password
        ]);

        $orderArray = $request->all() + ['user_id' => $user->id];

        $order = Order::create($orderArray);

        DB::commit();

        return $order;
    }
}
