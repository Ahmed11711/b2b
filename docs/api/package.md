# 📘 API Guide: Package

This documentation is auto-generated for the **packages** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/packages` | Bearer |
| View One | `GET` | `/packages/{id}` | Bearer |
| Create | `POST` | `/packages` | Bearer |
| Update | `PUT` | `/packages/{id}` | Bearer |
| Delete | `DELETE` | `/packages/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `name` | *varchar* | Field from database |
| `description` | *text* | Field from database |
| `price` | *decimal* | Field from database |
| `active` | *enum* | Field from database |
| `duration_months` | *int* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
