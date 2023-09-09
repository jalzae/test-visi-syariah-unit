<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="w-full h-full md:flex md:flex-row justify-center items-start p-8">

        <div class="md:w-1/2 sm:w-full md:p-8 text-left items-start bg-white shadow-md rounded-lg">
            <form class="w-full">
                <div class="items-center border-grey-500 py-2 flex justify-center">
                    <div class="w-1/3 m-4">
                        <label class="w-full border-gray-300">Lima ratus</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="limaratus" />
                    </div>
                    <div class="w-1/3 m-4">
                        <label class="w-full border-gray-300">Seribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="seribu" />
                    </div>
                    <div class="w-1/3 m-4">
                        <label class="w-full border-gray-300">Dua ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2 mr-4" placeholder="Jumlah" onchange="TotalJumlah()" id="duaribu" />
                    </div>

                </div>
                <div class="items-center border-grey-500 py-2 flex justify-center">
                    <div class="w-1/3 p-4">
                        <label class="w-full border-gray-300">Lima ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="limaribu" />
                    </div>
                    <div class="w-1/3 p-4">
                        <label class="w-full border-gray-300">Dua puluh ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="duapuluhribu" />
                    </div>

                </div>
                <div class="items-center border-grey-500 py-2 flex justify-center">
                    <div class="w-1/3 p-4">
                        <label class="w-full border-gray-300">Sepuluh ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="sepuluhribu" />
                    </div>
                    <div class="w-1/3 p-4">
                        <label class="w-full border-gray-300">Lima puluh ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="limapuluhribu" />
                    </div>
                    <div class="w-1/3 p-4">
                        <label class="w-full border-gray-300">Seratus ribu</label>
                        <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="TotalJumlah()" id="seratusribu" />
                    </div>

                </div>
                <div class="items-center border-grey-500 py-2">
                    <label class="w-full border-gray-300">Total Uang : <div id="totaljumlah"></div></label>

                </div>
                <div class="items-center border-grey-500 py-2">
                    <label class="w-full border-gray-300">Total Biaya</label>
                    <input v-model="form.counter_name" type="text" class="custom-input border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah" onchange="checkTotal()" id="totalbiaya" />
                </div>
                <div class="items-center border-grey-500 py-2">
                    <label class="w-full border-gray-300">Jumlah Bayar</label>
                    <input v-model="form.nama_member" type="text" id="jumlahbayar" class="border border-gray-300 rounded outline-none p-2 w-full mt-2" placeholder="Jumlah Bayar" />
                </div>

                <div class="w-full items-center py-2">
                    <button id="hitung" class="rounded-sm bg-red-500 text-white p-2 text-l w-full shadow-md cursor-pointer" :class="'btn-primary'">
                        Hitung
                    </button>
                </div>


                <div class="w-full flex flex-row">
                    <div class="w-1/2 mr-2 items-center border-grey-500 py-2">
                        <label class="w-full border-gray-300">Jumlah Kembalian : <div id="jumlah_kembalian"></div></label>

                    </div>
                    <div class="w-1/2 items-center border-grey-500 py-2">
                        <label class="w-full border-gray-300">Pecahan Kembalian: <div id="pecahan_kembalian"></div></label>
                    </div>
                </div>
                <div class="w-full flex flex-row">
                    <div class="w-1/2 items-center border-grey-500 py-2">
                        <label class="w-full border-gray-300">Pecahan Aulia: <div id="pecahan_aulia"></div></label>
                    </div>
                </div>




            </form>

        </div>
    </div>

    <script type='text/javascript'>
        function splitAmount(amount) {
            const denominations = [100000, 50000, 20000, 10000, 5000, 2000, 1000, 500];
            const result = {};
            for (const denomination of denominations) {
                if (amount >= denomination) {
                    const count = Math.floor(amount / denomination);
                    result[denomination] = count;
                    amount -= count * denomination;
                }
            }

            return result;
        }
        $(document).ready(function() {
            //assign variable 
            var pecahan_kembalian = $("#pecahan_kembalian").val()

            $('#limaratus,#seribu,#duaribu,#limaribu,#sepuluhribu,#limapuluhribu,#seratusribu,#jumlahbayar,#totalbiaya').on('keyup', function() {
                const value = $(this).val();
                $(this).val(value.replace(/\D/g, ''));
            });
            $('#limaratus,#seribu,#duaribu,#limaribu,#sepuluhribu,#limapuluhribu,#seratusribu,#jumlahbayar,#totalbiaya,#duapuluhribu').val(0)

            window.TotalJumlah = function() {
                var limaratus = $("#limaratus").val()
                var seribu = $("#seribu").val()
                var duaribu = $("#duaribu").val()
                var limaribu = $("#limaribu").val()
                var sepuluhribu = $("#sepuluhribu").val()
                var duapuluhribu = $("#duapuluhribu").val()
                var limapuluhribu = $("#limapuluhribu").val()
                var seratusribu = $("#seratusribu").val()


                const total = (parseFloat(limaratus) * 500) + (parseFloat(seribu) * 1000) + (parseFloat(duaribu) * 2000) + (parseFloat(limaribu) * 5000) + (parseFloat(sepuluhribu) * 10000) + (parseFloat(duapuluhribu) * 20000) + (parseFloat(limapuluhribu) * 50000) + (parseFloat(seratusribu) * 100000)

                $("#totaljumlah").html(total)
            }

            window.checkTotal = function() {
                var totaluang = $("#totaljumlah").html()
                var totalbiaya = $("#totalbiaya").val()

                var totaluang = parseFloat(totaluang)
                var totalBiaya = parseFloat(totalbiaya)

                if (totalBiaya > totaluang) {
                    alert("Total biaya lebih besar dari total uang!")
                    $("#totalbiaya").val(0)
                    return false
                }
            }

            window.chechJumlahbayar = function() {
                var totaluang = $("#jumlahbayar").html()
                var totalbiaya = $("#totalbiaya").val()

                var totaluang = parseFloat(totaluang)
                var totalBiaya = parseFloat(totalbiaya)

                if (totalBiaya > totaluang) {
                    alert("jumlah bayar harus lebih besar dari total biaya!")
                    $("#jumlahbayar").val(0)
                    return false
                }
            }

            $("#hitung").click(function(e) {
                e.preventDefault()

                var jumlahbayar = $("#jumlahbayar").val()
                var totalbiaya = $("#totalbiaya").val()

                var jumlahbayar = parseFloat(jumlahbayar)
                var totalbiaya = parseFloat(totalbiaya)
                var jumlah_kembalian = jumlahbayar - totalbiaya
                $("#jumlah_kembalian").html(jumlah_kembalian)

                $("#pecahan_kembalian").html(JSON.stringify(splitAmount(jumlah_kembalian)))

                var jumlahUang = $("#totaljumlah").html()
                var jumlahUang = parseFloat(jumlahUang)

                var sisaUang = jumlahUang - jumlahbayar

                $("#pecahan_aulia").html(`sisa uang aulia: ${sisaUang} dengan pecahan ${JSON.stringify(splitAmount(sisaUang))}`)

            })
        });
    </script>
</body>

</html>