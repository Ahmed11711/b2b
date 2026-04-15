# 📘 API Guide: verification

This documentation is auto-generated for the **verifications** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/verifications` | Bearer |
| View One | `GET` | `/verifications/{id}` | Bearer |
| Create | `POST` | `/verifications` | Bearer |
| Update | `PUT` | `/verifications/{id}` | Bearer |
| Delete | `DELETE` | `/verifications/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `id_card_front` | *varchar* | Field from database |
| `id_card_back` | *varchar* | Field from database |
| `commercial_register` | *varchar* | Field from database |
| `tax_card` | *varchar* | Field from database |
| `status` | *enum* | Field from database |
| `notes` | *text* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
