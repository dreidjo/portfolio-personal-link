# Personal Link Saver 🔗

A lightweight full-stack web application designed to save, manage, and filter web links by category. Built using vanilla JavaScript, PHP (PDO), and MySQL.

---

## 📷 App Preview

![App Screenshot](readmeimage/readme.png)

---

## ✨ Features

* **Save Links:** Add website links with custom titles and categories.
* **Dynamic Category Filtering:** Instantly filter saved links by category without refreshing the page.
* **Auto-Generated Categories:** Categories are dynamically populated based on existing database entries.
* **Delete Links:** Remove saved links directly from the dashboard.
* **Safe External Redirection:** Opens links safely in a new browser tab (`target="_blank"`).
* **Responsive Dashboard:** Card-based UI built with modern CSS and utility variables.

---

## 🛠️ Tech Stack

* **Frontend:** HTML5, Modern CSS3, JavaScript (Vanilla ES6, Fetch API)
* **Backend:** PHP 8+ (PDO for secure database interactions)
* **Database:** MySQL / MariaDB (`InnoDB` engine)

---

## 📁 Project Structure

```text
link-saver/
├── api/
│   ├── get_links.php     # Fetches links and dynamic categories
│   ├── save_link.php    # Handles link insertion & validation
│   └── delete_link.php  # Handles deletion by link ID
├── config/
│   └── db.php           # PDO database connection configuration
├── readmeimage/
│   └── readme.png       # Screenshot for project preview
├── index.html           # Main frontend interface & client logic
└── README.md            # Project documentation