<!-- <script type="text/javascript">
    function printlayer(layer){
        var generator = window.open(",'name,");
        var layetext = document.getElementById(layer);
        generator.document.write(layetext.innerHTML.replace("Print Me"));

        generator.document.close();
        generator.print();
        generator.close();
    }
</script> -->
<!--     <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script> -->

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Struk Pembelian Barang PT.RJSQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rojasqi Fadilla">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/blk-design-system.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/blk-design-system.min.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nucleo-icons.css')?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png')?>">
<!--     <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }
    </style> -->
</head>

<body onload="window.print()">
<!-- <button class="btn btn-info btn-sm btn-simple btn-round pull-right"><a href="" id="print" onclick="javascript:printlayer('div-id-name')">Print Report</a></button>&nbsp;&nbsp;&nbsp; -->
<div class="container">

    <style type="text/css">
        body{
            background-color: #ffffff;
        }
        [class*="span"] {
            float: left;
            min-height: 1px;
            margin-left: 5px;
        }
        .span {
            width: 220px;
        }
        .sign{
            height: 100px;
            border-bottom: 1px solid #000000;
        }
        .text-center{
            text-align: center
        }

        table.table-bordered{
        border:1px solid black;
        margin-top:20px;
        }
        table.table-bordered > thead > tr > th{
        border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
        border:1px solid black;
        }

    </style>
    <br>
    <div align="left">
        <?php if(isset($contact)){foreach($contact as $row){?>
            <strong style="font-size: x-large; float: left; color: #3a87ad;"><?php echo $row->nama?></strong> <br/><br/>
            <strong style="font-size: large; float: left; color: #3a87ad;"><?php echo $row->desc?></strong> <br/>
        <?php }} ?>
        <hr/>
        <table>
            <tr>
                <?php if(isset($contact)){foreach($contact as $row){?>
                    <td width="70%"><strong>Alamat : </strong> <?php echo $row->alamat?></td>
                <?php }} ?>
            </tr>
            <tr>
                <?php if(isset($contact)){foreach($contact as $row){?>
                    <td width="70%"><strong>Instagram : </strong> <?php echo $row->ig?> </td>
                <?php }}?>
            </tr>
            <tr>
                <td align="left"><strong>Operator : </strong> <?php echo $this->session->userdata('USERNAME')?></td>
            </tr>
            <tr>
                <td align="left"><strong>Date : </strong>  <?php echo isset($date1) ? $date1 : date('d M Y')?></td>
            </tr>
        </table>
    </div>
    <br/>

    <div align="center">
        <h3 style="border: 1px solid #333;"><font color="#000000">Struk Pembelian</font></h3>
        <br/>
        <div align="left">
            <table>
                <?php if(isset($dt_penjualan)){ foreach($dt_penjualan as $row) { ?>
                    <tr>
                        <td width="65%"><strong>Kode Penjualan : </strong> <?php echo $row->pj_id; ?></td>
                        <td style="float: right"><strong>Supplier : </strong> <?php echo $row->snama; ?></td>
                    </tr>
                    <tr>
                        <td width="65%"><strong>Tanggal Penjualan : </strong> <?php echo date("d M Y",strtotime($row->pj_tanggal));?></td>
                        <td style="float: right" width="52%"><strong>Alamat : </strong> <?php echo $row->salamat; ?></td>
                    </tr>
                <?php } } ?>
            </table>

        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><font color="#000000"><center>No</center></th>
                <th><font color="#000000"><center>Kode Barang</center></th>
                <th><font color="#000000"><center>Nama Barang</center></th>
                <th><font color="#000000"><center>Kategori</center></th>
                <th><font color="#000000"><center>Qty</center></th>
                <th><font color="#000000"><center>Harga</center></th>
            </tr>
            </thead>
            <?php
            $no=1;
            if(isset($barang_jual)){
            foreach($barang_jual as $row){
            ?>
            <tbody>
            <tr>
                <td><font color="#000000"><center><?php echo $no++; ?></center></td>
                <td><font color="#000000"><center><?php echo $row->djual_bid; ?></center></td>
                <td><font color="#000000"><center><?php echo $row->bnama; ?></center></td>
                <td><font color="#000000"><center><?php echo $row->kategori_nama; ?></center></td>
                <td><font color="#000000"><center><?php echo $row->djual_qty?></center></td>
                <td><font color="#000000"><center><?php echo currency_format($row->bharga_jual)?></center></td>
            </tr>
            <?php }
            }
            ?>
            </tbody>
        </table>
        <?php if(isset($dt_penjualan)){ foreach($dt_penjualan as $row) { ?>
            <h5 style="float:right;color: black">
                Total Harga : Rp<?php echo number_format($row->pj_total)?>
            </h5>
        <?php }}?>
    </div>
    <br/>
    <hr/>
</div>
</body>

