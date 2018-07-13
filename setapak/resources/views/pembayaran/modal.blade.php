    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="user"></h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="col-md-4"><h5>Tanggal Pembayaran</h5></td>
                            <td class="col-md-8" id="transaction_date" value=""><h6><strong></strong></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Tanggal Booking</h5></td>
                            <td class="col-md-8" id="tanggal_booking"><h6></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Total Harga</h5></td>
                            <td class="col-md-8" id="total_harga"><h6></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Kegiatan</h5></td>
                            <td class="col-md-8" id="nama_jasa"><h6></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Pemandu</h5></td>
                            <td class="col-md-8" id="pemandu"><h6></h6></td>
                        </tr>
                        <tr>
                            <td><h5 for="picture">Bukti Pembayaran</h5></td>
                                <img width="100" height="100" id="bukti_pembayaran" class="img-responsive"/>
                        </tr>
                                      
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal-homestay modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><strong>$homestay->transaction_id Charlie</strong></h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="col-md-4"><h5><strong>Tanggal Pembayaran</strong></h5></td>
                            <td class="col-md-8"><h6><strong>$homestay->transaction_date</strong></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Homestay</h5></td>
                            <td class="col-md-8"><h6>nama homestay</h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Tanggal Masuk</h5></td>
                            <td class="col-md-8"><h6>$homestay->check_in</h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Tanggal Keluar</h5></td>
                            <td class="col-md-8"><h6>$homestay->check_out</h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Total Harga</h5></td>
                            <td class="col-md-8"><h6>$homestay->total_harga</h6></td>
                        </tr>
                        <tr>
                            <td><h5 for="picture"><strong>Bukti Pembayaran</strong></h5></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal-barang modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><strong>$barang->transaction_id Charlie</strong></h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td class="col-md-4"><h5><strong>Tanggal Pembayaran</strong></h5></td>
                            <td class="col-md-8"><h6><strong>$barang->transaction_date</strong></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Total Harga</h5></td>
                            <td class="col-md-8"><h6>$barang->total_harga</h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Nama Barang</h5></td>
                            <td class="col-md-8"><h6>Masker</h6></h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Jumlah Barang</h5></td>
                            <td class="col-md-8"><h6>$barang->jumlah_barang</h6></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Ongkos Kirim</h5></td>
                            <td class="col-md-8"><h6>$barang->ongkos_kirim</h6></td>
                        </tr>
                        <tr>
                            <td><h5 for="picture"><strong>Bukti Pembayaran</strong></h5></td>
                        </tr>      
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->