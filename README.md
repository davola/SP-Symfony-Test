# SP-Symfony-Test
ScalablePath symfony test

---

# Hot to test this app?

## 1. Start postgres service
```
docker compose up
```

## 2. Install fixtures

```
symfony console doctrine:fixtures:load --no-interaction
```

## 3. Start php server

```
symfony serve
```

## 4. Navigate to products listing page
```
http://127.0.0.1:8000/products
```

## 5. Click to DELETE
Click on any DELETE  button to delete the related product.
An asynchronous request to the actual delete product endpoint will be made.
```
DELETE http://127.0.0.1:8000/products/{id}
```

Delete Notes:
- Deleted products will be removed from screen once they are successfully removed from database.
- Deleted products are being <b>Soft Deleted</b>.
- Product opacity is set to "50%" when clicked.
- Product visibility is set to "hidden" when removed successfully.
- You can use Chrome console for logs.