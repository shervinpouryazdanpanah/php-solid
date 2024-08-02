# SOLID in PHP

## Table of Contents

1. [Introduction](#introduction)
2. SOLID Principles
   1. [Single-Responsibility Principle (SRP)](#single-responsibility-principle-srp)
   2. [Open-Closed Principle (OCP)](#open-closed-principle-ocp)
   3. [Liskov Substitution Principle (LSP)](#liskov-substitution-principle-lsp)
   4. [Interface Segregation Principle (ISP)](#interface-segregation-principle-isp)
   5. [Dependency Inversion Principle (DIP)](#dependency-inversion-principle-dip)
3. [Project Structure](#project-structure)
4. [Additional Resources](#additional-resources)

## Introduction

In this project, you will learn about the SOLID principles, which are fundamental to object-oriented design. The project includes examples of each principle, demonstrating both correct and incorrect implementations in PHP.

## SOLID Principles

### Single-Responsibility Principle (SRP)

Single-responsibility Principle (SRP) states:

> A class should have one and only one reason to change, meaning that a class should have only one job.

### Open-Closed Principle

Open-closed Principle (OCP) states:

> Objects or entities should be open for extension but closed for modification.

### Liskov Substitution Principle

Liskov Substitution Principle states:

> Let q(x) be a property provable about objects of x of type T. Then q(y) should be provable for objects y of type S where S is a subtype of T

### Interface Segregation Principle

The interface segregation principle states:

> A client should never be forced to implement an interface that it doesn’t use, or clients shouldn’t be forced to depend on methods they do not use.

### Dependency Inversion Principle

Dependency inversion principle states:

> Entities must depend on abstractions, not on concretions. It states that the high-level module must not depend on the low-level module, but they should depend on abstractions.

## Project Structure

The project includes folders named after each SOLID principle. Inside each folder, there are two files: `true.php` and `false.php`. These files demonstrate the correct and incorrect implementations of each principle in PHP.

## Additional Resources

To complete this project, I used the following resources:

- [DigitalOcean Article on SOLID Principles](https://www.digitalocean.com/community/conceptual-articles/s-o-l-i-d-the-first-five-principles-of-object-oriented-design#open-closed-principle)
- [YouTube Playlist on SOLID Principles](https://www.youtube.com/watch?v=tJM6HSw5tVQ&list=PLwQhn2KOvsfWRg6po09v6TwR4yzsfcHl-)

Feel free to refer to these resources for a deeper understanding of SOLID principles.
