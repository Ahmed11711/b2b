# 📘 API Guide: BagItems

This documentation is auto-generated for the **bag_items** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/bag-items` | Bearer |
| View One | `GET` | `/bag-items/{id}` | Bearer |
| Create | `POST` | `/bag-items` | Bearer |
| Update | `PUT` | `/bag-items/{id}` | Bearer |
| Delete | `DELETE` | `/bag-items/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `price` | *decimal* | Field from database |
| `image` | *varchar* | Field from database |
| `currency` | *enum* | Field from database |
| `rating` | *varchar* | Field from database |
| `desc` | *text* | Field from database |
| `Whose` | *text* | Field from database |
| `what_will_you_get` | *text* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
