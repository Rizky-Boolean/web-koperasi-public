<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Purchase;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [

            [
                'buyer_name' => 'Admin',
                'payer_name' => 'Admin',
                'buyer_id' => '1111',
                'payer_id' => '1111',
                'gender_buyer' => 'Laki - Laki',
                'address' => 'Moroseneng',
                'password' => bcrypt('Admin'),
                'phone' => '085311112222',
                'user_category' => 'administrator',
                'role' => 'Administrator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'buyer_name' => 'Khoirunisa',
                'payer_name' => 'Khoirunisa',
                'buyer_id' => '1807131411860002',
                'payer_id' => '1807131411860002',
                'gender_buyer' => 'Perempuan',
                'address' => 'Moroseneng',
                'password' => bcrypt('Khoirun1411'),
                'phone' => '0853869267',
                'user_category' => 'administrator',
                'role' => 'Administrator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'buyer_name' => 'Nurtia Devi',
                'payer_name' => 'Nurtia Devi',
                'buyer_id' => '1807131511790003',
                'payer_id' => '1807131511790003',
                'gender_buyer' => 'Perempuan',
                'address' => 'Moroseneng',
                'password' => bcrypt('Asih1107'),
                'phone' => '085350723030',
                'user_category' => 'cashier',
                'role' => 'Kasir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'buyer_name' => 'Evi Khoiriah',
                'payer_name' => 'Evi Khoiriah',
                'buyer_id' => '1807131246900005',
                'payer_id' => '1807131246900005',
                'gender_buyer' => 'Perempuan',
                'address' => 'Moroseneng',
                'password' => bcrypt('Khoiriah1206'),
                'phone' => '08963217202',
                'user_category' => 'payer',
                'role' => 'Guru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'buyer_name' => 'Febri Muhamad Candra',
                'payer_name' => 'Abdul Rohman',
                'buyer_id' => '111218070012',
                'payer_id' => '1807132347300001',
                'gender_buyer' => 'Laki - Laki',
                'address' => 'Moroseneng',
                'password' => bcrypt('Abdul0473'),
                'phone' => '08961245678',
                'user_category' => 'payer',
                'role' => 'Orang Tua/Wali',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'buyer_name' => 'Rama Aldo Saputra',
                'payer_name' => 'Sukirno',
                'buyer_id' => '111218070012',
                'payer_id' => '1807121311830001',
                'gender_buyer' => 'Laki - Laki',
                'address' => 'Moroseneng',
                'password' => bcrypt('Sukirno1311'),
                'phone' => '08961243366',
                'user_category' => 'payer',
                'role' => 'Orang Tua/Wali',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],


        ];
        User::insert($users);

        $products = [

            [
                'product_number' => '1111',
                'name' => 'Pulpen Standard AE7',
                'price' => 2000,
                'stock' => 120,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1112',
                'name' => 'Pulpen Standard TECNO',
                'price' => 2500,
                'stock' => 120,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1113',
                'name' => 'Penggaris BETTERFLY 30cm',
                'price' => 2000,
                'stock' => 20,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1114',
                'name' => 'Pensil 2B Faber Castell',
                'price' => 3000,
                'stock' => 20,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1115',
                'name' => 'Spidol Snowman Marker Besar',
                'price' => 6000,
                'stock' => 7,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1116',
                'name' => 'Spidol Snowman Marker Kecil',
                'price' => 1500,
                'stock' => 9,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1117',
                'name' => 'Spidol Snowman White Board Marker',
                'price' => 7000,
                'stock' => 2,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1118',
                'name' => 'Buku Bastar Ria',
                'price' => 7000,
                'stock' => 6,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1119',
                'name' => 'Buku Sidu Isi 32',
                'price' => 2000,
                'stock' => 26,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1120',
                'name' => 'Buku Sidu Isi 38',
                'price' => 2500,
                'stock' => 16,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1121',
                'name' => 'Buku Sidu Isi 58',
                'price' => 3000,
                'stock' => 11,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'product_number' => '1122',
                'name' => 'Juz\'ama Kanzul Hikmah',
                'price' => 8000,
                'stock' => 5,
                'unit' => 'buah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        Product::insert($products);

        $transactions = [
            [
                'user_id' => 4,
                'price_transaction_total' => 9000,
                'is_buyed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 6,
                'price_transaction_total' => 9000,
                'is_buyed' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 10500,
                'is_buyed' => false,
                'created_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56'
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 11000,
                'is_buyed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 11000,
                'is_buyed' => false,
                'created_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56'
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 15000,
                'is_buyed' => false,
                'created_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56'
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 7500,
                'is_buyed' => false,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26'
            ],
            [
                'user_id' => 5,
                'price_transaction_total' => 16000,
                'is_buyed' => false,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56'
            ]
        ];
        Transaction::insert($transactions);

        $purchases = [
            [
                'transaction_id' => 1,
                'product_id' => 1,
                'amount' => 2,
                'price_total' => 4000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 1,
                'product_id' => 2,
                'amount' => 2,
                'price_total' => 5000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 2,
                'product_id' => 3,
                'amount' => 2,
                'price_total' => 4000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 2,
                'product_id' => 2,
                'amount' => 2,
                'price_total' => 5000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 3,
                'product_id' => 6,
                'amount' => 2,
                'price_total' => 3000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 3,
                'product_id' => 10,
                'amount' => 3,
                'price_total' => 7500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'transaction_id' => 4,
                'product_id' => 12,
                'amount' => 1,
                'price_total' => 8000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56'
            ],
            [
                'transaction_id' => 4,
                'product_id' => 4,
                'amount' => 1,
                'price_total' => 3000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-01 14:13:56'
            ],
            [
                'transaction_id' => 5,
                'product_id' => 12,
                'amount' => 1,
                'price_total' => 8000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56'
            ],
            [
                'transaction_id' => 5,
                'product_id' => 4,
                'amount' => 1,
                'price_total' => 3000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-02 14:13:56'
            ],
            [
                'transaction_id' => 6,
                'product_id' => 7,
                'amount' => 1,
                'price_total' => 7000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56'
            ],
            [
                'transaction_id' => 6,
                'product_id' => 12,
                'amount' => 1,
                'price_total' => 8000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-03 14:13:56'
            ],
            [
                'transaction_id' => 7,
                'product_id' => 4,
                'amount' => 2,
                'price_total' => 6000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26'
            ],
            [
                'transaction_id' => 7,
                'product_id' => 6,
                'amount' => 1,
                'price_total' => 1500,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 09:19:26'
            ],
            [
                'transaction_id' => 8,
                'product_id' => 8,
                'amount' => 2,
                'price_total' => 14000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56'
            ],
            [
                'transaction_id' => 8,
                'product_id' => 3,
                'amount' => 1,
                'price_total' => 2000,
                'created_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56',
                'updated_at' => getYear() . '-' . getMonthNumber() . '-04 14:13:56'
            ]
        ];
        Purchase::insert($purchases);


    }
}
