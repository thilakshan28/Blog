pipeline {
    agent any

    environment {
        GITHUB_CREDENTIALS = 'github-credentials'
        DOCKERHUB_CREDENTIALS = credentials('dockerhub-credentials')
        IMAGE_NAME = 'thilakshan28/blog' 
        DATABASE_CREDENTIALS = credentials('database-credentials')
    }

    stages {
        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --no-progress --prefer-dist'
            }
        }

        stage('Generate Key') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate --force'  
            }
        }

        stage('Run Migrations') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'database-credentials', usernameVariable: 'DB_USERNAME', passwordVariable: 'DB_PASSWORD')]) {
                    sh 'php artisan migrate --force'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    sh 'composer require --dev phpunit/phpunit:^10 --no-progress --prefer-dist'
                }
                withCredentials([usernamePassword(credentialsId: 'database-credentials', usernameVariable: 'DB_USERNAME', passwordVariable: 'DB_PASSWORD')]) {
                    sh './vendor/bin/phpunit'
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t ${IMAGE_NAME}:latest .'
            }
        }

        stage('Push to Docker Hub') {
            steps {
                script {
                    sh """
                    echo ${DOCKERHUB_CREDENTIALS_PSW} | docker login -u ${DOCKERHUB_CREDENTIALS_USR} --password-stdin
                    docker push ${IMAGE_NAME}:latest
                    docker logout
                    """
                }
            }
        }

        stage('Deploy Locally') {
            withCredentials([usernamePassword(credentialsId: 'database-credentials', usernameVariable: 'DB_USERNAME', passwordVariable: 'DB_PASSWORD')]) {
                sh 'docker compose down || true'
                sh 'docker compose up -d' 
            }
        }
    }
}
