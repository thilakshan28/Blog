pipeline {
    agent any

    environment {
        GITHUB_CREDENTIALS = 'github-credentials'
    }

    stages {

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --no-progress --prefer-dist'
            }
        }
        
        stage('Run Tests') {
            steps {
                script {
                    sh 'composer require --dev phpunit/phpunit:^10 --no-progress --prefer-dist'
                }
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
