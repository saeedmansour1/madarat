<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6ff;
            padding: 30px;
            margin: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .card, .table-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .amount-selector input {
            width: 80px;
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .amount-buttons button {
            padding: 10px 20px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            cursor: pointer;
        }
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        .method {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
        }
        .method input {
            margin-right: 10px;
        }
        .checkout-btn {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #00c37e;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .credit-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .credit-box div {
            margin: 10px 0;
        }
        .credit-box span {
            float: right;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        .status-paid {
            color: green;
            font-weight: bold;
        }
        .status-rejected {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- الدفع -->
    <div class="card">
        <div class="amount-selector">
            <input type="number" placeholder="300" />
            <div class="amount-buttons">
                <button>$10</button>
                <button>$20</button>
                <button>$60</button>
                <button>$150</button>
                <button>$300</button>
            </div>
        </div>

        <div>
            <p>Please choose your preferred method of payment.</p>
            <div class="payment-methods">
                <label class="method"><input type="radio" name="payment"> Bitcoin, LTC & DOGE</label>
                <label class="method"><input type="radio" name="payment"> USDT & Crypto</label>
                <label class="method"><input type="radio" name="payment"> PayPal</label>
                <label class="method"><input type="radio" name="payment"> Credit/Debit Cards</label>
                <label class="method"><input type="radio" name="payment"> Alipay</label>
            </div>
        </div>

        <button class="checkout-btn">CHECKOUT</button>
    </div>

    <!-- الرصيد -->
    <div class="credit-box">
        <div>Balance <span>$223.46</span></div>
        <div>Spent this month <span>$0.81</span></div>
    </div>

    <!-- سجل المعاملات -->
    <div class="table-container">
        <h3>Payment History</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Payment Method</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#498657</td>
                    <td>BTCPay</td>
                    <td>3 Jun 2025, 07:28</td>
                    <td class="status-rejected">Rejected</td>
                    <td>$223.95</td>
                </tr>
                <tr>
                    <td>#498651</td>
                    <td>Stripe</td>
                    <td>3 Jun 2025, 07:16</td>
                    <td class="status-paid">Paid</td>
                    <td>$223.95</td>
                </tr>
            </tbody>
                <tr>
                    <td>#878665</td>
                    <td>Stripe</td>
                    <td>1 july 2025, 11:29</td>
                    <td class="status-paid">Paid</td>
                    <td>$223.95</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
