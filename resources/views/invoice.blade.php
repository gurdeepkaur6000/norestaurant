
<style type="text/css">
		
		
		div.invoice {
		border:1px solid #ccc;
		padding:10px;
		height:740pt;
		width:570pt;
		}

		div.company-address {
			border:1px solid #ccc;
			float:left;
			width:200pt;
		}
		
		div.invoice-details {
			border:1px solid #ccc;
			float:right;
			width:200pt;
		}
		
		div.customer-address {
			border:1px solid #ccc;
			float:right;
			margin-bottom:50px;
			margin-top:100px;
			width:200pt;
		}
		
		div.clear-fix {
			clear:both;
			float:none;
		}
		
		table {
			width:100%;
		}
		
		th {
			text-align: left;
		}
		
		td {
		}
		
		.text-left {
			text-align:left;
		}
		
		.text-center {
			text-align:center;
		}
		
		.text-right {
			text-align:right;
		}
		
		</style>
	
	<div class="invoice">
		{{--<div class="company-address">
			ACME ltd
			<br />
			489 Road Street
			<br />
			London, AF3Z 7BP
			<br />
		</div>
	
		<div class="invoice-details">
			Invoice N°: 564
			<br />
			Date: 24/01/2012
		</div>
		
		<div class="customer-address">
			To:
			<br />
			Mr. Bill Terence
			<br />
			123 Long Street
			<br />
			London, DC3P F3Z 
			<br />
		</div>--}}
		
		<div class="clear-fix"></div>
			<table border='1' cellspacing='0'>
				<tr>
					<th width=250>Item</th>
					<th width=80>Quantity</th>
					<th width=100>Unit price</th>
					<th width=100>Total price</th>
				</tr>


				@foreach($tableOrderDetail as $tableorderDetailR)
				<tr>
					<td>{{$tableorderDetailR->item_id}}</td>
					<td class='text-right'>{{$tableorderDetailR->quantity}}</td>
					<td class='text-right'>€{{$tableorderDetailR->unit_price}}</td>
					<td class='text-right'>€{{$tableorderDetailR->price}}</td>
				</tr>
				@endforeach
			
				<tr>
					<td colspan='3' class='text-right'>Sub total</td>
					<td class='text-right'>€{{$orderDetail->total_price}}</td>
				</tr>
				<tr>
					<td colspan='3' class='text-right'>GST</td>
					<td class='text-right'>{{$orderDetail->gst}}</td>
				</tr>
				<tr>
					<td colspan='3' class='text-right'><b>TOTAL</b></td>
					<td class='text-right'><b>€{{$orderDetail->final_price}}</b></td>
				</tr>
			</table>
		</div>

		<!---- invoice --->		
			
				
       