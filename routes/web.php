<?php

// [START] - Backend Routes
require __DIR__ . '/backend/unclassified.php';
require __DIR__ . '/backend/auth.php';
require __DIR__ . '/backend/types.php';
require __DIR__ . '/backend/contents.php';
require __DIR__ . '/backend/glossaries.php';
require __DIR__ . '/backend/attachments.php';
require __DIR__ . '/backend/contacts.php';
require __DIR__ . '/backend/users.php';
require __DIR__ . '/backend/user_roles.php';
require __DIR__ . '/backend/change_password.php';
require __DIR__ . '/backend/audit_trail.php';
// [END] - Backend Routes

// [START] -Frontend Routes
require __DIR__ . '/frontend/culture.php';
require __DIR__ . '/frontend/glossary.php';
// [END] - Frontend Routes
