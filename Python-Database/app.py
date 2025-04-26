from flask import Flask, render_template, request, redirect, url_for
import psycopg2
from psycopg2.extras import RealDictCursor

app = Flask(__name__)

# Database connection details
host_name = "localhost"
port = 5432  
user_name = "postgres"
password = "postgres"
database = "db1"

def get_db_connection():
    return psycopg2.connect(
        host=host_name,
        port=port,
        user=user_name,
        password=password,
        dbname=database,
        cursor_factory=RealDictCursor
    )

@app.route('/')
def index():
    con = get_db_connection()
    try:
        with con.cursor() as cursor:
            query = "SELECT * FROM users"
            cursor.execute(query)
            results = cursor.fetchall()
            return render_template('index.html', results=results)
    finally:
        con.close()

@app.route('/insert', methods=['GET', 'POST'])
def insert():
    if request.method == 'POST':
        name = request.form['name']
        con = get_db_connection()
        try:
            with con.cursor() as cursor:
                query = "INSERT INTO users (name) VALUES (%s)"
                cursor.execute(query, (name,))
                con.commit()
            return redirect(url_for('index'))
        finally:
            con.close()
    return render_template('insert.html')

@app.route('/update', methods=['GET', 'POST'])
def update():
    id = request.args.get('id')
    con = get_db_connection()
    try:
        if request.method == 'POST':
            name = request.form['name']
            with con.cursor() as cursor:
                query = "UPDATE users SET name=%s WHERE id=%s"
                cursor.execute(query, (name, id))
                con.commit()
            return redirect(url_for('index'))
        else:
            with con.cursor() as cursor:
                query = "SELECT * FROM users WHERE id=%s"
                cursor.execute(query, (id,))
                result = cursor.fetchone()
            return render_template('update.html', result=result)
    finally:
        con.close()

@app.route('/delete')
def delete():
    id = request.args.get('id')
    con = get_db_connection()
    try:
        with con.cursor() as cursor:
            query = "DELETE FROM users WHERE id=%s"
            cursor.execute(query, (id,))
            con.commit()
        return redirect(url_for('index'))
    finally:
        con.close()

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=8083)
