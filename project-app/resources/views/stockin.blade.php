<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add stock-in</title>
</head>
    <body>
        <div class="content">
            <div class="product-form">
                <form method="POST" action="{{ config('app.url')}}/stock-in/add">
                @csrf
                <div class="form-group">
                    <h1>Add Stock-In</h1>
                </div>              
                <div class="form-input">
                        <div>
                            <label>Product code</label>
                            <input type="text" name="productCode">  
                        </div>
                        <div>
                            <label>Amount</label>
                            <input type="number" min="0" name="quantityToOrder">
                        </div>
                        <div>
                            <label>Date</label>
                            <input type="date" name="date">
                        </div>
                        <button type="submit">Confirm</button>
                    </div>
                    <a href="{{ config('app.url')}}/stock-in/add"><button>Cancel</button></a>
                </form>
            </div>  
        </div>
    </body>
</html>