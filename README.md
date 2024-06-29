## Update

### SQL Triggers

1. **Automatically converting the bottle donation to user points:**

```sql
DELIMITER //

CREATE TRIGGER after_bottle_donation_insert
AFTER INSERT ON bottle_donations
FOR EACH ROW
BEGIN
    DECLARE user_points INT;
    SELECT points INTO user_points FROM users WHERE id = NEW.user_id;

    UPDATE users
    SET points = user_points + (NEW.bottle_count * 10)
    WHERE id = NEW.user_id;
END //

DELIMITER ;
```

2. **Subtract the glove stock table when a user purchases it:**

```sql
DELIMITER //

CREATE TRIGGER after_glove_purchase_insert
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    UPDATE glove_stocks
    SET stock = stock - 1
    WHERE product_id = NEW.product_id AND stock > 0;

    IF (SELECT stock FROM glove_stocks WHERE product_id = NEW.product_id) <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Out of stock';
    END IF;
END //

DELIMITER ;
```

3. **Decrease user points when they purchase a product:**

```sql
DELIMITER //

CREATE TRIGGER after_purchase_insert
AFTER INSERT ON transactions
FOR EACH ROW
BEGIN
    DECLARE user_points INT;
    SELECT points INTO user_points FROM users WHERE id = NEW.user_id;

    IF user_points < NEW.price THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Insufficient points';
    ELSE
        UPDATE users
        SET points = user_points - NEW.price
        WHERE id = NEW.user_id;
    END IF;
END //

DELIMITER ;
```

### PHP Triggers (Laravel Eloquent Model Events)

1. **Automatically converting the bottle donation to user points:**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleDonation extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::created(function ($bottleDonation) {
            $user = $bottleDonation->user;
            $user->points += $bottleDonation->bottle_count * 10;
            $user->save();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

2. **Subtract the glove stock table when a user purchases it:**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Transaction extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::created(function ($transaction) {
            $gloveStock = GloveStock::where('product_id', $transaction->product_id)->first();

            if ($gloveStock && $gloveStock->stock > 0) {
                $gloveStock->stock -= 1;
                $gloveStock->save();
            } else {
                throw new ModelNotFoundException('Out of stock');
            }
        });
    }
}
```

3. **Decrease user points when they purchase a product:**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Transaction extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::created(function ($transaction) {
            $user = $transaction->user;

            if ($user->points < $transaction->price) {
                throw new ModelNotFoundException('Insufficient points');
            } else {
                $user->points -= $transaction->price;
                $user->save();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

### Glove Stock Constraint

1. **SQL:**

Ensure that the `stock` column in the `glove_stocks` table cannot go below 0:

```sql
ALTER TABLE glove_stocks
ADD CONSTRAINT chk_stock_nonnegative CHECK (stock >= 0);
```

2. **PHP:**

In the Laravel model, the stock constraint can be enforced within the event handling logic as shown above.

### User Points Constraint

1. **SQL:**

Ensure that the `points` column in the `users` table cannot go below 0:

```sql
ALTER TABLE users
ADD CONSTRAINT chk_points_nonnegative CHECK (points >= 0);
```

2. **PHP:**

In the Laravel model, the points constraint can be enforced within the event handling logic as shown above.
