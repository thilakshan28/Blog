pipeline {
    agent any

    environment {
        GITHUB_CREDENTIALS = 'github-credentials'  // Replace with your credentials ID
    }

    stages {
        stage('Clone Repository') {
            steps {
                git credentialsId: "${GITHUB_CREDENTIALS}", url: 'https://github.com/username/laravel-app.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev'
            }
        }

        stage('Run Tests') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t my-laravel-app:latest .'
            }
        }

        stage('Deploy') {
            steps {
                sh 'docker-compose up -d'
            }
        }
    }
}
