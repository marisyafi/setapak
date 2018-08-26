    <div class="modal fade" id="modal-jasa">
        <div class="modal-dialog">
            <form action="{{ route('pembayaran-pemandu.store') }}" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table">
                            <tr>
                                <td class="col-md-4"><h5>Nama Pemandu</h5></td>
                                <td class="col-md-8"><h5 id="nama"> </h5></td>
                                <input type="hidden" id="id" name="id"/>
                                <input type="hidden" id="jenis" name="jenis"/>
                                <input type="hidden" id="tanggal" name="tanggal"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Bulan</h5></td>
                                <td class="col-md-8"><h5 id="bulan"></h5></td>
                                <input type="hidden" id="bulans" name="bulan"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Saldo</h5></td>
                                <td class="col-md-8"><h5 id="total_harga"></h5></td>
                                <input type="hidden" id="total" name="total"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nama Bank</h5></td>
                                <td class="col-md-8" ><h5 id="bank"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nomor Rekening</h5></td>
                                <td class="col-md-8" ><h5 id="no_rekening"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nama Rekening</h5></td>
                                <td class="col-md-8" ><h5 id="nama_rekening"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Tanggal Transfer</h5></td>
                                <td class="col-md-8"><input type="date" id="tanggal_transfer" name="tanggal_transfer" class="form-control"/></td>
                            </tr>   
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-homestay">
        <div class="modal-dialog">
            <form action="{{ route('pembayaran-pemandu.store') }}" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table">
                            <tr>
                                <td class="col-md-4"><h5>Nama Pemandu</h5></td>
                                <td class="col-md-8"><h5 id="nama"> </h5></td>
                                <input type="hidden" id="id" name="id"/>
                                <input type="hidden" id="jenis" name="jenis"/>
                                <input type="hidden" id="tanggal" name="tanggal"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Bulan</h5></td>
                                <td class="col-md-8"><h5 id="bulan"></h5></td>
                                <input type="hidden" id="bulans" name="bulan"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Saldo</h5></td>
                                <td class="col-md-8"><h5 id="total_harga"></h5></td>
                                <input type="hidden" id="total" name="total"/>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nama Bank</h5></td>
                                <td class="col-md-8" ><h5 id="bank"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nomor Rekening</h5></td>
                                <td class="col-md-8" ><h5 id="no_rekening"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Nama Rekening</h5></td>
                                <td class="col-md-8" ><h5 id="nama_rekening"></h5></td>
                            </tr>
                            <tr>
                                <td class="col-md-4"><h5>Tanggal Transfer</h5></td>
                                <td class="col-md-8"><input type="date" id="tanggal_transfer" name="tanggal_transfer" class="form-control"/></td>
                            </tr>   
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-barang">
        <div class="modal-dialog">
            <form action="{{ route('pembayaran-pemandu.store') }}" enctype="multipart/form-data" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table">
                        <tr>
                            <td class="col-md-4"><h5>Nama Pemandu</h5></td>
                            <td class="col-md-8"><h5 id="nama"> </h5></td>
                            <input type="hidden" id="id" name="id"/>
                            <input type="hidden" id="jenis" name="jenis"/>
                            <input type="hidden" id="tanggal" name="tanggal"/>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Bulan</h5></td>
                            <td class="col-md-8"><h5 id="bulan"></h5></td>
                            <input type="hidden" id="bulans" name="bulan"/>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Saldo</h5></td>
                            <td class="col-md-8"><h5 id="total_harga"></h5></td>
                            <input type="hidden" id="total" name="total"/>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Nama Bank</h5></td>
                            <td class="col-md-8" ><h5 id="bank"></h5></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Nomor Rekening</h5></td>
                            <td class="col-md-8" ><h5 id="no_rekening"></h5></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Nama Rekening</h5></td>
                            <td class="col-md-8" ><h5 id="nama_rekening"></h5></td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><h5>Tanggal Transfer</h5></td>
                            <td class="col-md-8"><input type="date" id="tanggal_transfer" name="tanggal_transfer" class="form-control"/></td>
                        </tr>   
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-email">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <p>Dear <span id="nama"></span><br>
                                <br>
                                Setapak has been successfully process a transaction to your account with details as follow :<br>
                                Date-Time                   : 2018-05-27T17:10:52.1Z <br>
                                To Account                  : <span id="no_rekening"></span><br>
                                Account Name                : <span id="nama_rekening"></span><br>
                                Destination Bank            : <span id="bank"></span><br>
                                Sender                      : Setapak <br>
                                Amount                      : <span id="total"></span><br>
                                <br>
                                We hope this information will be useful to you Thank you. <br>
                                Best regards, </p>
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