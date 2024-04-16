<?php


use Illuminate\Support\Carbon;

    function formatRupiah($nominal)
    {
        return 'Rp ' . number_format($nominal, 0, ',', '.');
    }

    function getNowDayNumber()
    {
        $dateString = Carbon::now();

        // Mengambil tanggal dari string
        $dateComponents = explode('-', $dateString);
        $day = intval($dateComponents[2]); // Mengonversi tanggal menjadi integer

        // Mengatur format tanggal
        if ($day < 10) {
            $formattedDay = $day; // Menambahkan '0' di depan tanggal jika kurang dari 10
        } else {
            $formattedDay = $day; // Tidak ada perubahan jika tanggal 10 atau lebih besar
        }

        return $formattedDay; // Output: '06'
    }

    function getMonthNumber()
    {
        $dateString = Carbon::now();

        // Mengambil tanggal dari string
        $dateComponents = explode('-', $dateString);
        return $dateComponents[1];
    }

    function getYear()
    {
        $dateString = Carbon::now();

        // Mengambil tanggal dari string
        $dateComponents = explode('-', $dateString);
        return $dateComponents[0];
    }

    function isMonthNow($date)
    {
        $dateNow = Carbon::now();
        // Mengambil tanggal dari string
        $dateNowComponents = explode('-', $dateNow);
        $monthNow = $dateNowComponents[1];

        $dateComponents = explode('-', $date);
        $month = $dateComponents[1];

        return $month == $monthNow;

    }

    function isYearNow($date)
    {
        $dateNow = Carbon::now();
        // Mengambil tanggal dari string
        $dateNowComponents = explode('-', $dateNow);
        $monthNow = $dateNowComponents[0];

        $dateComponents = explode('-', $date);
        $month = $dateComponents[0];

        return $month == $monthNow;

    }

    function getDayFromDate($date) {

        $dateComponents = explode('-', $date);
        return intval($dateComponents[2]);

    }

    function sumTotalFromTransaction( $transactions )
    {
        $total = 0;

        foreach ($transactions as $transaction) {
            $total += $transaction->price_transaction_total;
        }
        return $total;
    }

    function sumCashAmountFromPurchases( $purchases )
    {
        $total = 0;

        foreach ($purchases as $purchase) {
            if( $purchase->transaction->is_buyed == true ) :
                $total += $purchase->amount;
            endif;
        }
        return $total;
    }

    function sumCashPriceFromPurchases( $purchases )
    {
        $total = 0;

        foreach ($purchases as $purchase) {
            if( $purchase->transaction->is_buyed == true ) :
                $total += $purchase->price_total * $purchase->amount;
            endif;
        }
        return $total;
    }

    function sumCreditAmountFromPurchases( $purchases )
    {
        $total = 0;

        foreach ($purchases as $purchase) {
            if( $purchase->transaction->is_buyed == false ) :
                $total += $purchase->amount;
            endif;
        }
        return $total;
    }

    function sumCreditPriceFromPurchases( $purchases )
    {
        $total = 0;

        foreach ($purchases as $purchase) {
            if( $purchase->transaction->is_buyed == false ) :
                $total += $purchase->price_total * $purchase->amount;
            endif;
        }
        return $total;
    }

    function formatMonthYear($month, $year)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $namaBulan = $bulan[$month];
        $formattedDate = $namaBulan . ' ' . $year;

        return $formattedDate;
    }

    function getDateNow()
    {
        $month = getMonthNumber();
        $year = getYear();
        $day = getNowDayNumber();
        return $day . ' ' . formatMonthYear($month, $year);
    }

    function sumTotalFromProducts( $products )
    {
        $total = 0;

        foreach ($products as $product) {
            $total += $product->price;
        }
        return $total;
    }
