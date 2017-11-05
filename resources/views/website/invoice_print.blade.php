<style type="text/css">

* { margin: 0; padding: 0; }
body { font: 14px/1.4 Georgia, serif; }
#page-wrap { width: 800px; margin: 0 auto; }
table th {
	padding: 6px;
}
.table { border-collapse: collapse; font: 14px/1.4 Georgia, serif; }
.table td, .table th { border: 1px solid black; padding: 5px; }

#header { height: 25px; width: 100%; margin: 20px 0; background: #f90; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; letter-spacing: 20px; padding: 8px 0px; }

#address { width: 150px; height: 50px; float: left; }
#customer { overflow: hidden; }

#customer-title { font-size: 20px; font-weight: bold; float: left; }

#meta { float: right;  margin-top: 1px; width: 300px; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: right; background: #eee; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 1px solid #000; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }
#items tr.blank { border: 1px solid #000;0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

.left {
	width: 65%;
	float: left;
}
.right {
	margin-left: 150px;
	font-size: 16px;
	width: 35%;
	float: right;
}
</style>


 
@foreach($bookingspaces as $row)
@endforeach
<input type="hidden" value="{!!
        $datein     = $row->datein;
        $dateout    = $row->dateout;
        $selisih    = strtotime($dateout) -  strtotime($datein);
        $hari       = $selisih/(60*60*24);
        $total      = ($hari * $row->price);
        !!}">

<hr>

<h1 id="header"><center><h2>CUBIC-WORKSPACE</h2></h1>
<div id="page-wrap">
		<center><h2><u>INVOICE</u></h2></center>
<div class="left">
<table  class="table">
	<tr class="blank">
		<th bgcolor="#eee">Invoice #</th>
		<th>{{ $row->invoice }}</th>
	</tr>
	<tr>
		<th bgcolor="#eee">Date</th>
		<th>{{ date('Y-m-d') }}</th>
	</tr>
	<tr>
		<th bgcolor="#eee">Payment Methode</th>
		<th>{{ $row->paymentmethodes->name }}</th>
	</tr>
	<tr>
		<th bgcolor="#eee">Total Result</th>
		<th>Rp {{ number_format($row->totalprice, 2) }}</th>
	</tr>
</table>
</div>
<div class="right"><b>Name</b> : {{ $row->user->name }} <br><b>Email</b> : {{ $row->user->email }} <br> <b>Phone</b> : {{ $row->phone }} <br> <b>Address</b> : {{ $row->address }}
</div>
		<table id="items" class="table">
		  <tr>
			<th>Space</th>
			<th>Date</th>
			<th>Price</th>
			<th>Days</th>
			<th>Result</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr">{{ $row->companyservices->name }}</div></td>
		      <td class="description">{{ date('d F Y', strtotime($row->datein)) }} - {{ date('d F Y', strtotime($row->dateout)) }}</td>
		      <td>{{ number_format($row->price, 2) }}</td>
		      <td>{{ $hari }} Days </td>
		      <td><span class="price">Rp {{ number_format($row->totalprice, 2) }}</span></td>
		  </tr>
		  <tr>
		      <td colspan="4" class="total-line balance">Total</td>
		      <td class="total-value balance"><div class="due">Rp {{ number_format($row->totalprice, 2) }}</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		<br>www.cubicworkspace.com
		</div>
	
	</div>
	
</div>
