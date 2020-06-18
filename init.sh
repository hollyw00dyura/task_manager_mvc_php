#!/usr/bin/env bash
echo "Initializing DB..."
cd sql
mysql -uroot -p < init_db.sql
cd ..
echo "DB initialization is done"