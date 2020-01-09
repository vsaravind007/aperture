pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        echo 'npm install'
      }
    }
    stage('Test') {
      steps {
        echo 'test'
      }
    }
    stage("Deploy") {
      steps {
        script {
          def tag = sh(returnStdout: true, script: "git tag --contains | head -1").trim()
          if(tag.contains("dev-"))
            echo "Running DEV deploy"
          if(tag.contains("qa-"))
            echo "Running QA deploy"
          else 
            echo "Skipping deploment"
        }
      }
    }
  }
}
